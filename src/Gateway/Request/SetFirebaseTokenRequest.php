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
 * Request for setFirebaseToken: Set Firebase device token
 *
 * @see https://docs.gs2.io/api_reference/gateway/sdk/#setfirebasetoken
 */
class SetFirebaseTokenRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Device Token for Firebase Cloud Messaging */
    private $token;
    /** @var string Locale of the notification message */
    private $locale;
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
     * @return SetFirebaseTokenRequest
     */
	public function withNamespaceName(?string $namespaceName): SetFirebaseTokenRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return SetFirebaseTokenRequest
     */
	public function withAccessToken(?string $accessToken): SetFirebaseTokenRequest {
		$this->accessToken = $accessToken;
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
     * @return SetFirebaseTokenRequest
     */
	public function withToken(?string $token): SetFirebaseTokenRequest {
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
     * @return SetFirebaseTokenRequest
     */
	public function withLocale(?string $locale): SetFirebaseTokenRequest {
		$this->locale = $locale;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SetFirebaseTokenRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SetFirebaseTokenRequest {
        if ($data === null) {
            return null;
        }
        return (new SetFirebaseTokenRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withToken(array_key_exists('token', $data) && $data['token'] !== null ? $data['token'] : null)
            ->withLocale(array_key_exists('locale', $data) && $data['locale'] !== null ? $data['locale'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "token" => $this->getToken(),
            "locale" => $this->getLocale(),
        );
    }
}