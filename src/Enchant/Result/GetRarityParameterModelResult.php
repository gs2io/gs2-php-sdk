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

namespace Gs2\Enchant\Result;

use Gs2\Core\Model\IResult;
use Gs2\Enchant\Model\RarityParameterCountModel;
use Gs2\Enchant\Model\RarityParameterValueModel;
use Gs2\Enchant\Model\RarityParameterModel;

/**
 * Result of getRarityParameterModel: Get Rarity Parameter Model
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/#getrarityparametermodel
 */
class GetRarityParameterModelResult implements IResult {
    /** @var RarityParameterModel Rarity Parameter Model */
    private $item;

    /** @return RarityParameterModel|null Rarity Parameter Model */
	public function getItem(): ?RarityParameterModel {
		return $this->item;
	}

    /** @param RarityParameterModel|null $item Rarity Parameter Model */
	public function setItem(?RarityParameterModel $item) {
		$this->item = $item;
	}

    /**
     * @param RarityParameterModel|null $item Rarity Parameter Model
     * @return GetRarityParameterModelResult
     */
	public function withItem(?RarityParameterModel $item): GetRarityParameterModelResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetRarityParameterModelResult {
        if ($data === null) {
            return null;
        }
        return (new GetRarityParameterModelResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? RarityParameterModel::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}