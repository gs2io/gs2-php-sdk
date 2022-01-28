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

namespace Gs2\Ranking\Domain\Cache;

use Gs2\Ranking\Model\Score;

class ScoreDomainCache {

    /**
     * @var array<string, Score>
     */
    private $items;
    public function __construct() {
        $this->items = [];
    }

    public function update(
        Score $item
    ): void {
        /**
         * @var string
         */
        $keys = join(":", [
            (string)$item->getCategoryName(),
            (string)$item->getScorerUserId(),
            (string)$item->getUniqueId()
        ]);
        $this->items[$keys] = $item;
    }

    public function get(
        string $categoryName,
        string $scorerUserId,
        string $uniqueId
    ): Score {
        /**
         * @var string
         */
        $keys = join(":", [
            (string)$categoryName,
            (string)$scorerUserId,
            (string)$uniqueId
        ]);
        return $this->items[$keys];
    }

    public function delete(
        Score $item
    ): void {
        /**
         * @var string
         */
        $keys = join(":", [
            (string)$item->getCategoryName(),
            (string)$item->getScorerUserId(),
            (string)$item->getUniqueId()
        ]);
        unset($this->items[$keys]);
    }
}
