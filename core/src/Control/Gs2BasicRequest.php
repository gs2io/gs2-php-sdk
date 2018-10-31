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
     * タイムスタンプ
     * @var int
     */
    private $xGs2Timestamp;

    /**
     * GS2認証署名
     * @var string
     */
    private $xGs2RequestSign;

    /**
     * GS2リクエストID
     * @var string
     */
    private $xGs2RequestId;

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
	 * タイムスタンプを取得。
	 * 
	 * @return int タイムスタンプ
	 */
	function getxGs2Timestamp(): int {
		return $this->xGs2Timestamp;
	}

	/**
	 * タイムスタンプを設定。
	 * 通常は自動的に計算されるため、この値を設定する必要はありません。
	 * 
	 * @param int $xGs2Timestamp タイムスタンプ
	 */
	function setxGs2Timestamp(int $xGs2Timestamp): void {
		$this->xGs2Timestamp = $xGs2Timestamp;
	}

	/**
	 * タイムスタンプを設定。
	 * 通常は自動的に計算されるため、この値を設定する必要はありません。
	 * 
	 * @param int $xGs2Timestamp タイムスタンプ
     * @return self
	 */
	function withxGs2Timestamp(int $xGs2Timestamp): self {
		$this->setxGs2Timestamp($xGs2Timestamp);
		return $this;
	}

    /**
     * GS2認証署名を取得。
     *
     * @return string GS2認証署名
     */
    function getxGs2RequestSign(): string {
        return $this->xGs2RequestSign;
    }

    /**
     * GS2認証署名を設定。
     * 通常は自動的に計算されるため、この値を設定する必要はありません。
     *
     * @param string xGs2RequestSign GS2認証署名
     */
    function setxGs2RequestSign(string $xGs2RequestSign): void {
        $this->xGs2RequestSign = $xGs2RequestSign;
    }

    /**
     * GS2認証署名を設定。
     * 通常は自動的に計算されるため、この値を設定する必要はありません。
     *
     * @param string xGs2RequestSign GS2認証署名
     * @return self
     */
    function withxGs2RequestSign(string $xGs2RequestSign): self {
        $this->setxGs2RequestSign($xGs2RequestSign);
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
