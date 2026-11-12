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
 * Account Deletion Setting
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#accountdeletionsetting
 */
class AccountDeletionSetting implements IModel {
	/**
     * @var int Grace period (minutes)
	 */
	private $gracePeriodMinutes;
	/**
     * @var string Behavior when logging in during the grace period
	 */
	private $loginDuringGracePeriod;
	/**
     * @var string Range of user data to delete
	 */
	private $cleanUserDataScope;
    /** @return int|null Grace period (minutes) */
	public function getGracePeriodMinutes(): ?int {
		return $this->gracePeriodMinutes;
	}
    /** @param int|null $gracePeriodMinutes Grace period (minutes) */
	public function setGracePeriodMinutes(?int $gracePeriodMinutes) {
		$this->gracePeriodMinutes = $gracePeriodMinutes;
	}
    /**
     * @param int|null $gracePeriodMinutes Grace period (minutes)
     * @return AccountDeletionSetting
     */
	public function withGracePeriodMinutes(?int $gracePeriodMinutes): AccountDeletionSetting {
		$this->gracePeriodMinutes = $gracePeriodMinutes;
		return $this;
	}
    /** @return string|null Behavior when logging in during the grace period */
	public function getLoginDuringGracePeriod(): ?string {
		return $this->loginDuringGracePeriod;
	}
    /** @param string|null $loginDuringGracePeriod Behavior when logging in during the grace period */
	public function setLoginDuringGracePeriod(?string $loginDuringGracePeriod) {
		$this->loginDuringGracePeriod = $loginDuringGracePeriod;
	}
    /**
     * @param string|null $loginDuringGracePeriod Behavior when logging in during the grace period
     * @return AccountDeletionSetting
     */
	public function withLoginDuringGracePeriod(?string $loginDuringGracePeriod): AccountDeletionSetting {
		$this->loginDuringGracePeriod = $loginDuringGracePeriod;
		return $this;
	}
    /** @return string|null Range of user data to delete */
	public function getCleanUserDataScope(): ?string {
		return $this->cleanUserDataScope;
	}
    /** @param string|null $cleanUserDataScope Range of user data to delete */
	public function setCleanUserDataScope(?string $cleanUserDataScope) {
		$this->cleanUserDataScope = $cleanUserDataScope;
	}
    /**
     * @param string|null $cleanUserDataScope Range of user data to delete
     * @return AccountDeletionSetting
     */
	public function withCleanUserDataScope(?string $cleanUserDataScope): AccountDeletionSetting {
		$this->cleanUserDataScope = $cleanUserDataScope;
		return $this;
	}

    public static function fromJson(?array $data): ?AccountDeletionSetting {
        if ($data === null) {
            return null;
        }
        return (new AccountDeletionSetting())
            ->withGracePeriodMinutes(array_key_exists('gracePeriodMinutes', $data) && $data['gracePeriodMinutes'] !== null ? $data['gracePeriodMinutes'] : null)
            ->withLoginDuringGracePeriod(array_key_exists('loginDuringGracePeriod', $data) && $data['loginDuringGracePeriod'] !== null ? $data['loginDuringGracePeriod'] : null)
            ->withCleanUserDataScope(array_key_exists('cleanUserDataScope', $data) && $data['cleanUserDataScope'] !== null ? $data['cleanUserDataScope'] : null);
    }

    public function toJson(): array {
        return array(
            "gracePeriodMinutes" => $this->getGracePeriodMinutes(),
            "loginDuringGracePeriod" => $this->getLoginDuringGracePeriod(),
            "cleanUserDataScope" => $this->getCleanUserDataScope(),
        );
    }
}