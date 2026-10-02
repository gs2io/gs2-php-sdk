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
 * Request for invokeScript: Execute the script
 *
 * @see https://docs.gs2.io/api_reference/script/sdk/#invokescript
 */
class InvokeScriptRequest extends Gs2BasicRequest {
    /** @var string Script GRN */
    private $scriptId;
    /** @var string User ID */
    private $userId;
    /** @var string Arguments (JSON Format) */
    private $args;
    /** @var RandomStatus Random number status */
    private $randomStatus;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Script GRN */
	public function getScriptId(): ?string {
		return $this->scriptId;
	}
    /** @param string|null $scriptId Script GRN */
	public function setScriptId(?string $scriptId) {
		$this->scriptId = $scriptId;
	}
    /**
     * @param string|null $scriptId Script GRN
     * @return InvokeScriptRequest
     */
	public function withScriptId(?string $scriptId): InvokeScriptRequest {
		$this->scriptId = $scriptId;
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
     * @return InvokeScriptRequest
     */
	public function withUserId(?string $userId): InvokeScriptRequest {
		$this->userId = $userId;
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
     * @return InvokeScriptRequest
     */
	public function withArgs(?string $args): InvokeScriptRequest {
		$this->args = $args;
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
     * @return InvokeScriptRequest
     */
	public function withRandomStatus(?RandomStatus $randomStatus): InvokeScriptRequest {
		$this->randomStatus = $randomStatus;
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
     * @return InvokeScriptRequest
     */
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
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "scriptId" => $this->getScriptId(),
            "userId" => $this->getUserId(),
            "args" => $this->getArgs(),
            "randomStatus" => $this->getRandomStatus() !== null ? $this->getRandomStatus()->toJson() : null,
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}