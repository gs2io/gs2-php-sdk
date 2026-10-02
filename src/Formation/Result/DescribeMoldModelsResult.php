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

namespace Gs2\Formation\Result;

use Gs2\Core\Model\IResult;
use Gs2\Formation\Model\SlotModel;
use Gs2\Formation\Model\FormModel;
use Gs2\Formation\Model\MoldModel;

/**
 * Result of describeMoldModels: List Form Storage Area Models
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#describemoldmodels
 */
class DescribeMoldModelsResult implements IResult {
    /** @var array List of Form Storage Areas */
    private $items;

    /** @return array|null List of Form Storage Areas */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items List of Form Storage Areas */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items List of Form Storage Areas
     * @return DescribeMoldModelsResult
     */
	public function withItems(?array $items): DescribeMoldModelsResult {
		$this->items = $items;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeMoldModelsResult {
        if ($data === null) {
            return null;
        }
        return (new DescribeMoldModelsResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return MoldModel::fromJson($item);
                },
                $data['items']
            ));
    }

    public function toJson(): array {
        return array(
            "items" => $this->getItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems()
            ),
        );
    }
}