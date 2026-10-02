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

namespace Gs2\Buff\Result;

use Gs2\Core\Model\IResult;
use Gs2\Buff\Model\CurrentBuffMaster;

/**
 * Result of updateCurrentBuffMasterFromGitHub: Update master data of the currently active Buff Entry Models from GitHub
 *
 * @see https://docs.gs2.io/api_reference/buff/sdk/#updatecurrentbuffmasterfromgithub
 */
class UpdateCurrentBuffMasterFromGitHubResult implements IResult {
    /** @var CurrentBuffMaster Updated master data of the currently active Buff Entry Models */
    private $item;

    /** @return CurrentBuffMaster|null Updated master data of the currently active Buff Entry Models */
	public function getItem(): ?CurrentBuffMaster {
		return $this->item;
	}

    /** @param CurrentBuffMaster|null $item Updated master data of the currently active Buff Entry Models */
	public function setItem(?CurrentBuffMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentBuffMaster|null $item Updated master data of the currently active Buff Entry Models
     * @return UpdateCurrentBuffMasterFromGitHubResult
     */
	public function withItem(?CurrentBuffMaster $item): UpdateCurrentBuffMasterFromGitHubResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCurrentBuffMasterFromGitHubResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateCurrentBuffMasterFromGitHubResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentBuffMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}