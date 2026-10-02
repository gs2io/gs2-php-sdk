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
use Gs2\Enchant\Model\RarityParameterModelMaster;

/**
 * Result of updateRarityParameterModelMaster: Update Rarity Parameter Model Master
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/#updaterarityparametermodelmaster
 */
class UpdateRarityParameterModelMasterResult implements IResult {
    /** @var RarityParameterModelMaster Rarity Parameter Model Master updated */
    private $item;

    /** @return RarityParameterModelMaster|null Rarity Parameter Model Master updated */
	public function getItem(): ?RarityParameterModelMaster {
		return $this->item;
	}

    /** @param RarityParameterModelMaster|null $item Rarity Parameter Model Master updated */
	public function setItem(?RarityParameterModelMaster $item) {
		$this->item = $item;
	}

    /**
     * @param RarityParameterModelMaster|null $item Rarity Parameter Model Master updated
     * @return UpdateRarityParameterModelMasterResult
     */
	public function withItem(?RarityParameterModelMaster $item): UpdateRarityParameterModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateRarityParameterModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateRarityParameterModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? RarityParameterModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}