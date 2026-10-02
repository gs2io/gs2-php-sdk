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

namespace Gs2\Grade\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for cleanUserDataByUserId: Clean User Data by User ID
 *
 * @see https://docs.gs2.io/api_reference/grade/sdk/#cleanuserdatabyuserid
 */
class CleanUserDataByUserIdRequest extends Gs2BasicRequest {
    /** @var string User ID */
    private $userId;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return CleanUserDataByUserIdRequest
     */
	public function withUserId(?string $userId): CleanUserDataByUserIdRequest {
		$this->userId = $userId;
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
     * @return CleanUserDataByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): CleanUserDataByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?CleanUserDataByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new CleanUserDataByUserIdRequest())
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}