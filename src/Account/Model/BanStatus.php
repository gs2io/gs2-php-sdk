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


/**
 * Account Ban Status
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#banstatus
 */
class BanStatus implements IModel {
	/**
     * @var string Ban status name
	 */
	private $name;
	/**
     * @var string Reason for BAN
	 */
	private $reason;
	/**
     * @var int Date and time when the BAN will be released
	 */
	private $releaseTimestamp;
    /** @return string|null Ban status name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Ban status name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Ban status name
     * @return BanStatus
     */
	public function withName(?string $name): BanStatus {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Reason for BAN */
	public function getReason(): ?string {
		return $this->reason;
	}
    /** @param string|null $reason Reason for BAN */
	public function setReason(?string $reason) {
		$this->reason = $reason;
	}
    /**
     * @param string|null $reason Reason for BAN
     * @return BanStatus
     */
	public function withReason(?string $reason): BanStatus {
		$this->reason = $reason;
		return $this;
	}
    /** @return int|null Date and time when the BAN will be released */
	public function getReleaseTimestamp(): ?int {
		return $this->releaseTimestamp;
	}
    /** @param int|null $releaseTimestamp Date and time when the BAN will be released */
	public function setReleaseTimestamp(?int $releaseTimestamp) {
		$this->releaseTimestamp = $releaseTimestamp;
	}
    /**
     * @param int|null $releaseTimestamp Date and time when the BAN will be released
     * @return BanStatus
     */
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