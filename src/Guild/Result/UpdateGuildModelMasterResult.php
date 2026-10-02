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

namespace Gs2\Guild\Result;

use Gs2\Core\Model\IResult;
use Gs2\Guild\Model\RoleModel;
use Gs2\Guild\Model\GuildModelMaster;

/**
 * Result of updateGuildModelMaster: Update Guild Model Master
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#updateguildmodelmaster
 */
class UpdateGuildModelMasterResult implements IResult {
    /** @var GuildModelMaster Guild Model Master updated */
    private $item;

    /** @return GuildModelMaster|null Guild Model Master updated */
	public function getItem(): ?GuildModelMaster {
		return $this->item;
	}

    /** @param GuildModelMaster|null $item Guild Model Master updated */
	public function setItem(?GuildModelMaster $item) {
		$this->item = $item;
	}

    /**
     * @param GuildModelMaster|null $item Guild Model Master updated
     * @return UpdateGuildModelMasterResult
     */
	public function withItem(?GuildModelMaster $item): UpdateGuildModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateGuildModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateGuildModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? GuildModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}