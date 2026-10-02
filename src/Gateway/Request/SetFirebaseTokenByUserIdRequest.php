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

namespace Gs2\Gateway\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for setFirebaseTokenByUserId: Set Firebase device token by User ID
 *
 * @see https://docs.gs2.io/api_reference/gateway/sdk/#setfirebasetokenbyuserid
 */
class SetFirebaseTokenByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Device Token for Firebase Cloud Messaging */
    private $token;
    /** @var string Locale of the notification message */
    private $locale;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return SetFirebaseTokenByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): SetFirebaseTokenByUserIdRequest {
		$this->namespaceName = $namespaceName;
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
     * @return SetFirebaseTokenByUserIdRequest
     */
	public function withUserId(?string $userId): SetFirebaseTokenByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Device Token for Firebase Cloud Messaging */
	public function getToken(): ?string {
		return $this->token;
	}
    /** @param string|null $token Device Token for Firebase Cloud Messaging */
	public function setToken(?string $token) {
		$this->token = $token;
	}
    /**
     * @param string|null $token Device Token for Firebase Cloud Messaging
     * @return SetFirebaseTokenByUserIdRequest
     */
	public function withToken(?string $token): SetFirebaseTokenByUserIdRequest {
		$this->token = $token;
		return $this;
	}
    /** @return string|null Locale of the notification message */
	public function getLocale(): ?string {
		return $this->locale;
	}
    /** @param string|null $locale Locale of the notification message */
	public function setLocale(?string $locale) {
		$this->locale = $locale;
	}
    /**
     * @param string|null $locale Locale of the notification message
     * @return SetFirebaseTokenByUserIdRequest
     */
	public function withLocale(?string $locale): SetFirebaseTokenByUserIdRequest {
		$this->locale = $locale;
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
     * @return SetFirebaseTokenByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): SetFirebaseTokenByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SetFirebaseTokenByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SetFirebaseTokenByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SetFirebaseTokenByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withToken(array_key_exists('token', $data) && $data['token'] !== null ? $data['token'] : null)
            ->withLocale(array_key_exists('locale', $data) && $data['locale'] !== null ? $data['locale'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "token" => $this->getToken(),
            "locale" => $this->getLocale(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}