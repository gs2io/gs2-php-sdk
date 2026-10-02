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

namespace Gs2\Money2\Result;

use Gs2\Core\Model\IResult;
use Gs2\Money2\Model\CurrentModelMaster;

/**
 * Result of updateCurrentModelMasterFromGitHub: Update currently active Models master data from GitHub
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#updatecurrentmodelmasterfromgithub
 */
class UpdateCurrentModelMasterFromGitHubResult implements IResult {
    /** @var CurrentModelMaster Updated master data of the currently active model */
    private $item;

    /** @return CurrentModelMaster|null Updated master data of the currently active model */
	public function getItem(): ?CurrentModelMaster {
		return $this->item;
	}

    /** @param CurrentModelMaster|null $item Updated master data of the currently active model */
	public function setItem(?CurrentModelMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentModelMaster|null $item Updated master data of the currently active model
     * @return UpdateCurrentModelMasterFromGitHubResult
     */
	public function withItem(?CurrentModelMaster $item): UpdateCurrentModelMasterFromGitHubResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCurrentModelMasterFromGitHubResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateCurrentModelMasterFromGitHubResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}