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

namespace Gs2\Version\Result;

use Gs2\Core\Model\IResult;
use Gs2\Version\Model\Version;
use Gs2\Version\Model\ScheduleVersion;
use Gs2\Version\Model\VersionModelMaster;

/**
 * Result of createVersionModelMaster: Create Version Model Master
 *
 * @see https://docs.gs2.io/api_reference/version/sdk/#createversionmodelmaster
 */
class CreateVersionModelMasterResult implements IResult {
    /** @var VersionModelMaster Version Model Master created */
    private $item;

    /** @return VersionModelMaster|null Version Model Master created */
	public function getItem(): ?VersionModelMaster {
		return $this->item;
	}

    /** @param VersionModelMaster|null $item Version Model Master created */
	public function setItem(?VersionModelMaster $item) {
		$this->item = $item;
	}

    /**
     * @param VersionModelMaster|null $item Version Model Master created
     * @return CreateVersionModelMasterResult
     */
	public function withItem(?VersionModelMaster $item): CreateVersionModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateVersionModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new CreateVersionModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? VersionModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}