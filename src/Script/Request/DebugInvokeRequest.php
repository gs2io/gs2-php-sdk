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

namespace Gs2\Script\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Script\Model\RandomUsed;
use Gs2\Script\Model\RandomStatus;

/**
 * Request for debugInvoke: Execute Script
 *
 * @see https://docs.gs2.io/api_reference/script/sdk/#debuginvoke
 */
class DebugInvokeRequest extends Gs2BasicRequest {
    /** @var string Lua Script */
    private $script;
    /** @var string Arguments (JSON Format) */
    private $args;
    /** @var string User ID */
    private $userId;
    /** @var RandomStatus Random number status */
    private $randomStatus;
    /** @var bool Disable String-Number Conversion */
    private $disableStringNumberToNumber;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Lua Script */
	public function getScript(): ?string {
		return $this->script;
	}
    /** @param string|null $script Lua Script */
	public function setScript(?string $script) {
		$this->script = $script;
	}
    /**
     * @param string|null $script Lua Script
     * @return DebugInvokeRequest
     */
	public function withScript(?string $script): DebugInvokeRequest {
		$this->script = $script;
		return $this;
	}
    /** @return string|null Arguments (JSON Format) */
	public function getArgs(): ?string {
		return $this->args;
	}
    /** @param string|null $args Arguments (JSON Format) */
	public function setArgs(?string $args) {
		$this->args = $args;
	}
    /**
     * @param string|null $args Arguments (JSON Format)
     * @return DebugInvokeRequest
     */
	public function withArgs(?string $args): DebugInvokeRequest {
		$this->args = $args;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return DebugInvokeRequest
     */
	public function withUserId(?string $userId): DebugInvokeRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return RandomStatus|null Random number status */
	public function getRandomStatus(): ?RandomStatus {
		return $this->randomStatus;
	}
    /** @param RandomStatus|null $randomStatus Random number status */
	public function setRandomStatus(?RandomStatus $randomStatus) {
		$this->randomStatus = $randomStatus;
	}
    /**
     * @param RandomStatus|null $randomStatus Random number status
     * @return DebugInvokeRequest
     */
	public function withRandomStatus(?RandomStatus $randomStatus): DebugInvokeRequest {
		$this->randomStatus = $randomStatus;
		return $this;
	}
    /** @return bool|null Disable String-Number Conversion */
	public function getDisableStringNumberToNumber(): ?bool {
		return $this->disableStringNumberToNumber;
	}
    /** @param bool|null $disableStringNumberToNumber Disable String-Number Conversion */
	public function setDisableStringNumberToNumber(?bool $disableStringNumberToNumber) {
		$this->disableStringNumberToNumber = $disableStringNumberToNumber;
	}
    /**
     * @param bool|null $disableStringNumberToNumber Disable String-Number Conversion
     * @return DebugInvokeRequest
     */
	public function withDisableStringNumberToNumber(?bool $disableStringNumberToNumber): DebugInvokeRequest {
		$this->disableStringNumberToNumber = $disableStringNumberToNumber;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return DebugInvokeRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): DebugInvokeRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DebugInvokeRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DebugInvokeRequest {
        if ($data === null) {
            return null;
        }
        return (new DebugInvokeRequest())
            ->withScript(array_key_exists('script', $data) && $data['script'] !== null ? $data['script'] : null)
            ->withArgs(array_key_exists('args', $data) && $data['args'] !== null ? $data['args'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withRandomStatus(array_key_exists('randomStatus', $data) && $data['randomStatus'] !== null ? RandomStatus::fromJson($data['randomStatus']) : null)
            ->withDisableStringNumberToNumber(array_key_exists('disableStringNumberToNumber', $data) ? $data['disableStringNumberToNumber'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "script" => $this->getScript(),
            "args" => $this->getArgs(),
            "userId" => $this->getUserId(),
            "randomStatus" => $this->getRandomStatus() !== null ? $this->getRandomStatus()->toJson() : null,
            "disableStringNumberToNumber" => $this->getDisableStringNumberToNumber(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}