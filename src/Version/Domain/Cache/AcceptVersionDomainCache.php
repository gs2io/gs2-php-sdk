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

namespace Gs2\Version\Domain\Cache;

use Gs2\Version\Model\AcceptVersion;

class AcceptVersionDomainCache {

    /**
     * @var array<string, AcceptVersion>
     */
    private $items;
    public function __construct() {
        $this->items = [];
    }

    public function update(
        AcceptVersion $item
    ): void {
        /**
         * @var string
         */
        $keys = join(":", [
            (string)$item->getVersionName()
        ]);
        $this->items[$keys] = $item;
    }

    public function get(
        string $versionName
    ): AcceptVersion {
        /**
         * @var string
         */
        $keys = join(":", [
            (string)$versionName
        ]);
        return $this->items[$keys];
    }

    public function delete(
        AcceptVersion $item
    ): void {
        /**
         * @var string
         */
        $keys = join(":", [
            (string)$item->getVersionName()
        ]);
        unset($this->items[$keys]);
    }
}
