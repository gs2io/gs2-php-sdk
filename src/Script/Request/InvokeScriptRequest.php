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

class InvokeScriptRequest extends Gs2BasicRequest {
    /** @var string */
    private $scriptId;
    /** @var string */
    private $userId;
    /** @var string */
    private $args;
    /** @var RandomStatus */
    private $randomStatus;
    /** @var bool */
    private $forceUseDistributor;
    /** @var string */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
	public function getScriptId(): ?string {
		return $this->scriptId;
	}
	public function setScriptId(?string $scriptId) {
		$this->scriptId = $scriptId;
	}
	public function withScriptId(?string $scriptId): InvokeScriptRequest {
		$this->scriptId = $scriptId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): InvokeScriptRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getArgs(): ?string {
		return $this->args;
	}
	public function setArgs(?string $args) {
		$this->args = $args;
	}
	public function withArgs(?string $args): InvokeScriptRequest {
		$this->args = $args;
		return $this;
	}
	public function getRandomStatus(): ?RandomStatus {
		return $this->randomStatus;
	}
	public function setRandomStatus(?RandomStatus $randomStatus) {
		$this->randomStatus = $randomStatus;
	}
	public function withRandomStatus(?RandomStatus $randomStatus): InvokeScriptRequest {
		$this->randomStatus = $randomStatus;
		return $this;
	}
	public function getForceUseDistributor(): ?bool {
		return $this->forceUseDistributor;
	}
	public function setForceUseDistributor(?bool $forceUseDistributor) {
		$this->forceUseDistributor = $forceUseDistributor;
	}
	public function withForceUseDistributor(?bool $forceUseDistributor): InvokeScriptRequest {
		$this->forceUseDistributor = $forceUseDistributor;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): InvokeScriptRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): InvokeScriptRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?InvokeScriptRequest {
        if ($data === null) {
            return null;
        }
        return (new InvokeScriptRequest())
            ->withScriptId(array_key_exists('scriptId', $data) && $data['scriptId'] !== null ? $data['scriptId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withArgs(array_key_exists('args', $data) && $data['args'] !== null ? $data['args'] : null)
            ->withRandomStatus(array_key_exists('randomStatus', $data) && $data['randomStatus'] !== null ? RandomStatus::fromJson($data['randomStatus']) : null)
            ->withForceUseDistributor(array_key_exists('forceUseDistributor', $data) ? $data['forceUseDistributor'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "scriptId" => $this->getScriptId(),
            "userId" => $this->getUserId(),
            "args" => $this->getArgs(),
            "randomStatus" => $this->getRandomStatus() !== null ? $this->getRandomStatus()->toJson() : null,
            "forceUseDistributor" => $this->getForceUseDistributor(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}