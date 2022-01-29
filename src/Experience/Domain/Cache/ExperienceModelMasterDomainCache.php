<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Experience\Domain\Cache;

use Gs2\Experience\Model\ExperienceModelMaster;

class ExperienceModelMasterDomainCache {

    /**
     * @var array<string, ExperienceModelMaster>
     */
    private $items;
    public function __construct() {
        $this->items = [];
    }

    public function update(
        ExperienceModelMaster $item
    ): void {
        /**
         * @var string
         */
        $keys = join(":", [
            (string)$item->getName()
        ]);
        $this->items[$keys] = $item;
    }

    public function get(
        string $experienceName
    ): ExperienceModelMaster {
        /**
         * @var string
         */
        $keys = join(":", [
            (string)$experienceName
        ]);
        return $this->items[$keys];
    }

    public function delete(
        ExperienceModelMaster $item
    ): void {
        /**
         * @var string
         */
        $keys = join(":", [
            (string)$item->getName()
        ]);
        unset($this->items[$keys]);
    }
}