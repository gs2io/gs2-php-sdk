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

namespace Gs2\Project\Model;

use Gs2\Core\Model\IModel;


class Gs2Region implements IModel {
	/**
     * @var string
	 */
	private $regionName;
	/**
     * @var string
	 */
	private $status;
	public function getRegionName(): ?string {
		return $this->regionName;
	}
	public function setRegionName(?string $regionName) {
		$this->regionName = $regionName;
	}
	public function withRegionName(?string $regionName): Gs2Region {
		$this->regionName = $regionName;
		return $this;
	}
	public function getStatus(): ?string {
		return $this->status;
	}
	public function setStatus(?string $status) {
		$this->status = $status;
	}
	public function withStatus(?string $status): Gs2Region {
		$this->status = $status;
		return $this;
	}

    public static function fromJson(?array $data): ?Gs2Region {
        if ($data === null) {
            return null;
        }
        return (new Gs2Region())
            ->withRegionName(array_key_exists('regionName', $data) && $data['regionName'] !== null ? $data['regionName'] : null)
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? $data['status'] : null);
    }

    public function toJson(): array {
        return array(
            "regionName" => $this->getRegionName(),
            "status" => $this->getStatus(),
        );
    }
}