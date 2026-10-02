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
use Gs2\Enchant\Model\CurrentParameterMaster;

/**
 * Result of updateCurrentParameterMasterFromGitHub: Updates currently active Parameter Model master data from GitHub
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/#updatecurrentparametermasterfromgithub
 */
class UpdateCurrentParameterMasterFromGitHubResult implements IResult {
    /** @var CurrentParameterMaster Updated master data of the currently active Parameter Models */
    private $item;

    /** @return CurrentParameterMaster|null Updated master data of the currently active Parameter Models */
	public function getItem(): ?CurrentParameterMaster {
		return $this->item;
	}

    /** @param CurrentParameterMaster|null $item Updated master data of the currently active Parameter Models */
	public function setItem(?CurrentParameterMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentParameterMaster|null $item Updated master data of the currently active Parameter Models
     * @return UpdateCurrentParameterMasterFromGitHubResult
     */
	public function withItem(?CurrentParameterMaster $item): UpdateCurrentParameterMasterFromGitHubResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCurrentParameterMasterFromGitHubResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateCurrentParameterMasterFromGitHubResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentParameterMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}