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

namespace Gs2\MegaField\Result;

use Gs2\Core\Model\IResult;
use Gs2\MegaField\Model\LayerModel;
use Gs2\MegaField\Model\AreaModel;

/**
 * Result of getAreaModel: Get Area Model
 *
 * @see https://docs.gs2.io/api_reference/mega_field/sdk/#getareamodel
 */
class GetAreaModelResult implements IResult {
    /** @var AreaModel Area Model */
    private $item;

    /** @return AreaModel|null Area Model */
	public function getItem(): ?AreaModel {
		return $this->item;
	}

    /** @param AreaModel|null $item Area Model */
	public function setItem(?AreaModel $item) {
		$this->item = $item;
	}

    /**
     * @param AreaModel|null $item Area Model
     * @return GetAreaModelResult
     */
	public function withItem(?AreaModel $item): GetAreaModelResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetAreaModelResult {
        if ($data === null) {
            return null;
        }
        return (new GetAreaModelResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? AreaModel::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}