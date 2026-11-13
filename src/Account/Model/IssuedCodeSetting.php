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
 * Issued Takeover Code Configuration
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#issuedcodesetting
 */
class IssuedCodeSetting implements IModel {
	/**
     * @var int Validity Period (days)
	 */
	private $expiresDays;
	/**
     * @var int Maximum Number of Failed Attempts
	 */
	private $maxFailedAttempts;
	/**
     * @var bool Expire the code when it is used
	 */
	private $deleteOnUse;
    /** @return int|null Validity Period (days) */
	public function getExpiresDays(): ?int {
		return $this->expiresDays;
	}
    /** @param int|null $expiresDays Validity Period (days) */
	public function setExpiresDays(?int $expiresDays) {
		$this->expiresDays = $expiresDays;
	}
    /**
     * @param int|null $expiresDays Validity Period (days)
     * @return IssuedCodeSetting
     */
	public function withExpiresDays(?int $expiresDays): IssuedCodeSetting {
		$this->expiresDays = $expiresDays;
		return $this;
	}
    /** @return int|null Maximum Number of Failed Attempts */
	public function getMaxFailedAttempts(): ?int {
		return $this->maxFailedAttempts;
	}
    /** @param int|null $maxFailedAttempts Maximum Number of Failed Attempts */
	public function setMaxFailedAttempts(?int $maxFailedAttempts) {
		$this->maxFailedAttempts = $maxFailedAttempts;
	}
    /**
     * @param int|null $maxFailedAttempts Maximum Number of Failed Attempts
     * @return IssuedCodeSetting
     */
	public function withMaxFailedAttempts(?int $maxFailedAttempts): IssuedCodeSetting {
		$this->maxFailedAttempts = $maxFailedAttempts;
		return $this;
	}
    /** @return bool|null Expire the code when it is used */
	public function getDeleteOnUse(): ?bool {
		return $this->deleteOnUse;
	}
    /** @param bool|null $deleteOnUse Expire the code when it is used */
	public function setDeleteOnUse(?bool $deleteOnUse) {
		$this->deleteOnUse = $deleteOnUse;
	}
    /**
     * @param bool|null $deleteOnUse Expire the code when it is used
     * @return IssuedCodeSetting
     */
	public function withDeleteOnUse(?bool $deleteOnUse): IssuedCodeSetting {
		$this->deleteOnUse = $deleteOnUse;
		return $this;
	}

    public static function fromJson(?array $data): ?IssuedCodeSetting {
        if ($data === null) {
            return null;
        }
        return (new IssuedCodeSetting())
            ->withExpiresDays(array_key_exists('expiresDays', $data) && $data['expiresDays'] !== null ? $data['expiresDays'] : null)
            ->withMaxFailedAttempts(array_key_exists('maxFailedAttempts', $data) && $data['maxFailedAttempts'] !== null ? $data['maxFailedAttempts'] : null)
            ->withDeleteOnUse(array_key_exists('deleteOnUse', $data) ? $data['deleteOnUse'] : null);
    }

    public function toJson(): array {
        return array(
            "expiresDays" => $this->getExpiresDays(),
            "maxFailedAttempts" => $this->getMaxFailedAttempts(),
            "deleteOnUse" => $this->getDeleteOnUse(),
        );
    }
}