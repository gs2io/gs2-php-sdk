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

namespace Gs2\Account\Model;

use Gs2\Core\Model\IModel;


class BanStatus implements IModel {
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $reason;
	/**
     * @var int
	 */
	private $releaseTimestamp;
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): BanStatus {
		$this->name = $name;
		return $this;
	}
	public function getReason(): ?string {
		return $this->reason;
	}
	public function setReason(?string $reason) {
		$this->reason = $reason;
	}
	public function withReason(?string $reason): BanStatus {
		$this->reason = $reason;
		return $this;
	}
	public function getReleaseTimestamp(): ?int {
		return $this->releaseTimestamp;
	}
	public function setReleaseTimestamp(?int $releaseTimestamp) {
		$this->releaseTimestamp = $releaseTimestamp;
	}
	public function withReleaseTimestamp(?int $releaseTimestamp): BanStatus {
		$this->releaseTimestamp = $releaseTimestamp;
		return $this;
	}

    public static function fromJson(?array $data): ?BanStatus {
        if ($data === null) {
            return null;
        }
        return (new BanStatus())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withReason(array_key_exists('reason', $data) && $data['reason'] !== null ? $data['reason'] : null)
            ->withReleaseTimestamp(array_key_exists('releaseTimestamp', $data) && $data['releaseTimestamp'] !== null ? $data['releaseTimestamp'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "reason" => $this->getReason(),
            "releaseTimestamp" => $this->getReleaseTimestamp(),
        );
    }
}