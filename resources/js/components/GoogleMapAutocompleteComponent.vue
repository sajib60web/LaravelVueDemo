<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Google Map Autocomplete</div>
                    <div class="card-body">
                        <GMapAutocomplete @place_changed="setPlace">
                            <input type="text" class="form-control" placeholder="Enter a location" />
                        </GMapAutocomplete>
                        <br>
                        <br>
                        <GMapMap :center="centerLocation" :zoom="15" map-type-id="terrain"
                            style="width: 100%; height: 400px;">
                            <GMapMarker :key="index" v-for="(m, index) in markers" :position="m.position"
                                :clickable="true" :draggable="true" @click="openMarker(m.id)">
                                <GMapInfoWindow :closeclick="true" @closeclick="openMarker(null)"
                                    :opened="openedMarkerID === m.id">
                                    <div>I am in info window {{ m.id }} </div>
                                </GMapInfoWindow>
                            </GMapMarker>
                        </GMapMap>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';

export default {
    setup() {
        const centerLocation = { lat: 51.093048, lng: 6.84212 };
        const openedMarkerID = ref(null);
        const markers = [
            {
                id: 1,
                position: {
                    lat: 51.093048,
                    lng: 6.84212
                }
            },
            {
                id: 2,
                position: {
                    lat: 51.198429,
                    lng: 6.69529
                }
            }
        ];

        const setPlace = () => {
            console.log(place);
            // You can extract lat, lng, address, and other details from the place object.
            const location = place.geometry.location;
            console.log("Location coordinates:", location.lat(), location.lng());
        }

        const openMarker = (id) => {
            openedMarkerID.value = id;
        }

        return {
            centerLocation,
            openedMarkerID,
            markers,
            setPlace,
            openMarker,
        }
    }
};
</script>
