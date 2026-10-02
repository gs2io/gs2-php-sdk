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

namespace Gs2\Money2\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for importUserDataByUserId: Execute import of data associated with the specified user ID
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#importuserdatabyuserid
 */
class ImportUserDataByUserIdRequest extends Gs2BasicRequest {
    /** @var string User ID */
    private $userId;
    /** @var string Token received in preparation for upload */
    private $uploadToken;
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
     * @return ImportUserDataByUserIdRequest
     */
	public function withUserId(?string $userId): ImportUserDataByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Token received in preparation for upload */
	public function getUploadToken(): ?string {
		return $this->uploadToken;
	}
    /** @param string|null $uploadToken Token received in preparation for upload */
	public function setUploadToken(?string $uploadToken) {
		$this->uploadToken = $uploadToken;
	}
    /**
     * @param string|null $uploadToken Token received in preparation for upload
     * @return ImportUserDataByUserIdRequest
     */
	public function withUploadToken(?string $uploadToken): ImportUserDataByUserIdRequest {
		$this->uploadToken = $uploadToken;
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
     * @return ImportUserDataByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): ImportUserDataByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?ImportUserDataByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new ImportUserDataByUserIdRequest())
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withUploadToken(array_key_exists('uploadToken', $data) && $data['uploadToken'] !== null ? $data['uploadToken'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "uploadToken" => $this->getUploadToken(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}