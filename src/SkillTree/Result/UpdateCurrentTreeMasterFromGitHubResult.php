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

namespace Gs2\SkillTree\Result;

use Gs2\Core\Model\IResult;
use Gs2\SkillTree\Model\CurrentTreeMaster;

/**
 * Result of updateCurrentTreeMasterFromGitHub: Update currently active Node Model master data from GitHub
 *
 * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#updatecurrenttreemasterfromgithub
 */
class UpdateCurrentTreeMasterFromGitHubResult implements IResult {
    /** @var CurrentTreeMaster Updated master data of the currently active Node Models */
    private $item;

    /** @return CurrentTreeMaster|null Updated master data of the currently active Node Models */
	public function getItem(): ?CurrentTreeMaster {
		return $this->item;
	}

    /** @param CurrentTreeMaster|null $item Updated master data of the currently active Node Models */
	public function setItem(?CurrentTreeMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentTreeMaster|null $item Updated master data of the currently active Node Models
     * @return UpdateCurrentTreeMasterFromGitHubResult
     */
	public function withItem(?CurrentTreeMaster $item): UpdateCurrentTreeMasterFromGitHubResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCurrentTreeMasterFromGitHubResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateCurrentTreeMasterFromGitHubResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentTreeMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}