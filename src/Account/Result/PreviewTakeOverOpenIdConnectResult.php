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

namespace Gs2\Account\Result;

use Gs2\Core\Model\IResult;
use Gs2\Account\Model\BanStatus;
use Gs2\Account\Model\Account;

/**
 * Result of previewTakeOverOpenIdConnect: Preview Account Takeover using OpenID Connect
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#previewtakeoveropenidconnect
 */
class PreviewTakeOverOpenIdConnectResult implements IResult {
    /** @var Account Game Player Account to be taken over (the password is not included) */
    private $item;
    /** @var array Active ban statuses. When not empty, no access token is issued */
    private $banStatuses;
    /** @var string Read-only access token for the account to be taken over. Not issued while the account has an active ban, nor when differentUserIdForLoginAndDataRetention is enabled and the account has never logged in (there is no data to read yet) */
    private $token;
    /** @var int Expiration time */
    private $expire;

    /** @return Account|null Game Player Account to be taken over (the password is not included) */
	public function getItem(): ?Account {
		return $this->item;
	}

    /** @param Account|null $item Game Player Account to be taken over (the password is not included) */
	public function setItem(?Account $item) {
		$this->item = $item;
	}

    /**
     * @param Account|null $item Game Player Account to be taken over (the password is not included)
     * @return PreviewTakeOverOpenIdConnectResult
     */
	public function withItem(?Account $item): PreviewTakeOverOpenIdConnectResult {
		$this->item = $item;
		return $this;
	}

    /** @return array|null Active ban statuses. When not empty, no access token is issued */
	public function getBanStatuses(): ?array {
		return $this->banStatuses;
	}

    /** @param array|null $banStatuses Active ban statuses. When not empty, no access token is issued */
	public function setBanStatuses(?array $banStatuses) {
		$this->banStatuses = $banStatuses;
	}

    /**
     * @param array|null $banStatuses Active ban statuses. When not empty, no access token is issued
     * @return PreviewTakeOverOpenIdConnectResult
     */
	public function withBanStatuses(?array $banStatuses): PreviewTakeOverOpenIdConnectResult {
		$this->banStatuses = $banStatuses;
		return $this;
	}

    /** @return string|null Read-only access token for the account to be taken over. Not issued while the account has an active ban, nor when differentUserIdForLoginAndDataRetention is enabled and the account has never logged in (there is no data to read yet) */
	public function getToken(): ?string {
		return $this->token;
	}

    /** @param string|null $token Read-only access token for the account to be taken over. Not issued while the account has an active ban, nor when differentUserIdForLoginAndDataRetention is enabled and the account has never logged in (there is no data to read yet) */
	public function setToken(?string $token) {
		$this->token = $token;
	}

    /**
     * @param string|null $token Read-only access token for the account to be taken over. Not issued while the account has an active ban, nor when differentUserIdForLoginAndDataRetention is enabled and the account has never logged in (there is no data to read yet)
     * @return PreviewTakeOverOpenIdConnectResult
     */
	public function withToken(?string $token): PreviewTakeOverOpenIdConnectResult {
		$this->token = $token;
		return $this;
	}

    /** @return int|null Expiration time */
	public function getExpire(): ?int {
		return $this->expire;
	}

    /** @param int|null $expire Expiration time */
	public function setExpire(?int $expire) {
		$this->expire = $expire;
	}

    /**
     * @param int|null $expire Expiration time
     * @return PreviewTakeOverOpenIdConnectResult
     */
	public function withExpire(?int $expire): PreviewTakeOverOpenIdConnectResult {
		$this->expire = $expire;
		return $this;
	}

    public static function fromJson(?array $data): ?PreviewTakeOverOpenIdConnectResult {
        if ($data === null) {
            return null;
        }
        return (new PreviewTakeOverOpenIdConnectResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Account::fromJson($data['item']) : null)
            ->withBanStatuses(!array_key_exists('banStatuses', $data) || $data['banStatuses'] === null ? null : array_map(
                function ($item) {
                    return BanStatus::fromJson($item);
                },
                $data['banStatuses']
            ))
            ->withToken(array_key_exists('token', $data) && $data['token'] !== null ? $data['token'] : null)
            ->withExpire(array_key_exists('expire', $data) && $data['expire'] !== null ? $data['expire'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "banStatuses" => $this->getBanStatuses() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getBanStatuses()
            ),
            "token" => $this->getToken(),
            "expire" => $this->getExpire(),
        );
    }
}