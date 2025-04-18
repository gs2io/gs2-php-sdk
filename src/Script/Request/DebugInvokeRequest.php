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

class DebugInvokeRequest extends Gs2BasicRequest {
    /** @var string */
    private $script;
    /** @var string */
    private $args;
    /** @var string */
    private $userId;
    /** @var RandomStatus */
    private $randomStatus;
    /** @var bool */
    private $disableStringNumberToNumber;
    /** @var string */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
	public function getScript(): ?string {
		return $this->script;
	}
	public function setScript(?string $script) {
		$this->script = $script;
	}
	public function withScript(?string $script): DebugInvokeRequest {
		$this->script = $script;
		return $this;
	}
	public function getArgs(): ?string {
		return $this->args;
	}
	public function setArgs(?string $args) {
		$this->args = $args;
	}
	public function withArgs(?string $args): DebugInvokeRequest {
		$this->args = $args;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): DebugInvokeRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getRandomStatus(): ?RandomStatus {
		return $this->randomStatus;
	}
	public function setRandomStatus(?RandomStatus $randomStatus) {
		$this->randomStatus = $randomStatus;
	}
	public function withRandomStatus(?RandomStatus $randomStatus): DebugInvokeRequest {
		$this->randomStatus = $randomStatus;
		return $this;
	}
	public function getDisableStringNumberToNumber(): ?bool {
		return $this->disableStringNumberToNumber;
	}
	public function setDisableStringNumberToNumber(?bool $disableStringNumberToNumber) {
		$this->disableStringNumberToNumber = $disableStringNumberToNumber;
	}
	public function withDisableStringNumberToNumber(?bool $disableStringNumberToNumber): DebugInvokeRequest {
		$this->disableStringNumberToNumber = $disableStringNumberToNumber;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
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