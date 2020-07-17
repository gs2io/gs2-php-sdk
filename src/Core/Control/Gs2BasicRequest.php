<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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
namespace Gs2\Core\Control;


abstract class Gs2BasicRequest {

	/**
     * GS2認証クライアントID
     * @var string
     */
	private $xGs2ClientId;

    /**
     * GS2リクエストID
     * @var string
     */
    private $xGs2RequestId;

    /**
     * コンテキストスタック
     * @var string
     */
    private $contextStack;

	/**
	 * GS2認証クライアントIDを取得。
	 * 
	 * @return string GS2認証クライアントID
	 */
	function getxGs2ClientId(): string {
		return $this->xGs2ClientId;
	}

	/**
	 * GS2認証クライアントIDを設定。
	 * 通常は自動的に計算されるため、この値を設定する必要はありません。
	 * 
	 * @param string $xGs2ClientId GS2認証クライアントID
	 */
	function setxGs2ClientId(string $xGs2ClientId): void {
		$this->xGs2ClientId = $xGs2ClientId;
	}

	/**
	 * GS2認証クライアントIDを設定。
	 * 通常は自動的に計算されるため、この値を設定する必要はありません。
	 * 
	 * @param string $xGs2ClientId GS2認証クライアントID
     * @return self
	 */
    function withxGs2ClientId(string $xGs2ClientId): self {
		$this->setxGs2ClientId($xGs2ClientId);
		return $this;
	}

    /**
     * コンテキストスタックを取得。
     *
     * @return string|null コンテキストスタック
     */
    function getContextStack() {
        return $this->contextStack;
    }

    /**
     * コンテキストスタックを設定。
     *
     * @param string $contextStack コンテキストスタック
     */
    function setContextStack(string $contextStack): void {
        $this->contextStack = $contextStack;
    }

    /**
     * コンテキストスタックを設定。
     *
     * @param string $contextStack コンテキストスタック
     * @return self
     */
    function withContextStack(string $contextStack): self {
        $this->setContextStack($contextStack);
        return $this;
    }

    /**
     * GS2リクエストIDを取得。
     *
     * @return string|null GS2リクエストID
     */
    function getRequestId() {
        return $this->xGs2RequestId;
    }

    /**
     * GS2リクエストIDを設定。
     *
     * @param string $xGs2RequestId GS2リクエストID
     */
    function setRequestId(string $xGs2RequestId): void {
        $this->xGs2RequestId = $xGs2RequestId;
    }

    /**
     * GS2リクエストIDを設定。
     *
     * @param string $xGs2RequestId GS2リクエストID
     * @return self
     */
    function withRequestId(string $xGs2RequestId): self {
        $this->setRequestId($xGs2RequestId);
        return $this;
    }

}
