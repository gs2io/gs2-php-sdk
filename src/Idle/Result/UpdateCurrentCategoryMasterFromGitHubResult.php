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

namespace Gs2\Idle\Result;

use Gs2\Core\Model\IResult;
use Gs2\Idle\Model\CurrentCategoryMaster;

/**
 * Result of updateCurrentCategoryMasterFromGitHub: Update currently active Category Model master data from GitHub
 *
 * @see https://docs.gs2.io/api_reference/idle/sdk/#updatecurrentcategorymasterfromgithub
 */
class UpdateCurrentCategoryMasterFromGitHubResult implements IResult {
    /** @var CurrentCategoryMaster Updated master data of the currently active Category Models */
    private $item;

    /** @return CurrentCategoryMaster|null Updated master data of the currently active Category Models */
	public function getItem(): ?CurrentCategoryMaster {
		return $this->item;
	}

    /** @param CurrentCategoryMaster|null $item Updated master data of the currently active Category Models */
	public function setItem(?CurrentCategoryMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentCategoryMaster|null $item Updated master data of the currently active Category Models
     * @return UpdateCurrentCategoryMasterFromGitHubResult
     */
	public function withItem(?CurrentCategoryMaster $item): UpdateCurrentCategoryMasterFromGitHubResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCurrentCategoryMasterFromGitHubResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateCurrentCategoryMasterFromGitHubResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentCategoryMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}